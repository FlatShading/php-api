# Simple PHP API

Simple php API using Laravel.

## Available Routes

- `GET /api/health` - Returns API status
- `POST /api/auth/login` - Authenticate user and return token
- `GET /api/auth/impersonate/{id}` - Impersonate a user (non-production only)
- `POST /api/journal/store` - Create a journal entry (requires authentication)

## Reminder

### Start server
```bash
php artisan serve --port=8000
```
