# Simple PHP API

Simple PHP API using Laravel with a React frontend.

## Backend (Laravel API)

### Available Routes

- `GET /api/health` - Returns API status
- `POST /api/auth/login` - Authenticate user and return token
- `GET /api/auth/impersonate/{id}` - Impersonate a user (non-production only)
- `POST /api/journal/store` - Create a journal entry (requires authentication)

### Start server
```bash
php artisan serve --port=8000
```

## Frontend (React)

The frontend is built with React 19, TypeScript, Vite, and Tailwind CSS.

### Start frontend
```bash
npm run dev
```

### Build for production
```bash
npm run build
```
