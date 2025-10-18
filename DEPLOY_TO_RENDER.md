Deploying to Render

1. Connect your Git repository to Render (select this repo and the `main` branch).

2. Create a new Web Service and choose "Docker" as the environment, or let Render detect `render.yaml`.

3. Add required environment variables in the Render dashboard:
   - `APP_ENV=production`
   - `APP_DEBUG=false`
   - `APP_KEY` (generate locally with `php artisan key:generate --show` and paste)
   - Database vars (if using a managed DB): `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
   - Mail/other services as needed

4. Render will build the Docker image and deploy. You can view logs in Render's dashboard.

Testing locally (optional)

Build the Docker image locally and run it:

```powershell
docker build -t portfolio:local .
docker run -p 8080:80 --env APP_ENV=local --env APP_DEBUG=1 portfolio:local
```

Then open http://localhost:8080

Notes
- This Dockerfile is a minimal multi-stage example. For production, consider:
  - Running `composer install --no-dev --optimize-autoloader` during build.
  - Running migrations during deploy via Render's deploy hooks.
  - Storing sensitive values in Render's environment secrets.
