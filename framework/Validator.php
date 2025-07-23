<?php

namespace Framework;

class Validator
{
    protected $errors = [];

    public function __construct(
        protected array $data,
        protected array $rules = [],
        protected bool $autoRedirect = true,
    ) {
        $this->validate();

        if($autoRedirect && !$this->passes()){
            $this->redirectIfFailed();
        }
    }

    public function validate(): void
    {
        foreach ($this->rules as $field => $rules) {
            $rules = explode('|', $rules);
            $value = trim($this->data[$field]);

            foreach ($rules as $rule) {
                [$name, $param] = array_pad(explode(':', $rule), 2, null);

              
                if ($error = $this->hasError($name,$param,$field,$value)) {
                    $this->errors[] = $error;

                    break;                    
                }
            }            
        }
    }

    protected function hasError(string $name, ?string $param, string $field, mixed $value) : ?string
    {
          return match ($name) {
                    'required'  => $this->validateRequired($field,$value),
                    'min'       => strlen($value) < $param  ? "$field must be at least $param characters."           : null,
                    'max'       => strlen($value) > $param  ? "$field must not exceed $param characters."            : null,
                    'url'       => filter_var($value, FILTER_VALIDATE_URL) === false ? "$field must be a valid URL." : null,
                    'email'     => filter_var($value, FILTER_VALIDATE_EMAIL) === false ? "$field must be a valid email address." : null,
                    default => throw new \InvalidArgumentException("Validation rule '$name' is not defined."),
                };

    }

    public function validateRequired (string $field, mixed $value) : ?string{
        return  ($value === null || $value === '') ? "$field is required." : null;
    }

    protected function redirectIfFailed(): void
    {
        $session = new SessionManager();
        $session->setFlash('error', $this->errors);
        
        back();
    }

    public static function make(array $data, array $rules, bool $autoRedirect = true): self
    {
        return new self($data, $rules, $autoRedirect);
    }

    public function passes(): bool
    {
        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }
}