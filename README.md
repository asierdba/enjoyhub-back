EnjoyHub Backend — Laravel API
A clean, modular and developer‑friendly backend built with Laravel, powering the EnjoyHub platform.
This API manages books, genres, emotions, user lists, recommendations, imports from Google Books, and admin tools.

The project is designed to be easy to set up, easy to extend, and pleasant to work with — even for developers joining the team for the first time.

📐 Architecture Overview
Código
                           +---------------------------+
                           |        Angular App        |
                           |     (enjoyhub-front)      |
                           +-------------+-------------+
                                         |
                                         |  HTTPS (REST API)
                                         v
+---------------------------+    +---------------------------+    +---------------------------+
|   Google Books API        |    |       Laravel API         |    |         MySQL DB          |
|  (External Data Source)   |<-->|  Controllers / Services   |<-->|  content, books, users... |
+---------------------------+    |  Models / Seeders         |    +---------------------------+
                                 |  Sanctum (auth)           |
+---------------------------+    |  Scribe (local Swagger)   |
|        OpenAI API         |    +---------------------------+
| (Recommendations logic)   |
+---------------------------+
🚀 Getting Started (Onboarding for New Developers)
This section is written so even someone with zero Laravel experience can follow it.

1. Clone the repository
Código
git clone https://github.com/asierdba/enjoyhub-back.git
cd enjoyhub-back
2. Install PHP dependencies
Código
composer install
3. Copy the environment file
Código
cp .env.example .env
4. Install Node dependencies (only if needed)
Código
npm install
5. Generate the Laravel app key
Código
php artisan key:generate
6. Create the database
Create a MySQL database named:

Código
enjoyhub
7. Run migrations
Código
php artisan migrate
8. Seed the database
Código
php artisan db:seed
9. Start the local server
Código
php artisan serve
Your API is now running at:

Código
http://localhost:8000
⚙️ Environment Configuration
Below is the .env.example you provided, cleaned and formatted, with generic placeholders for sensitive keys:

Código
APP_NAME="Laravel"
APP_ENV="local"
APP_KEY="base64:x1uwpYxA6g9zZ0C/XeC0I+xLFllAx1WM6QMur4fcL/8="
APP_DEBUG="true"
APP_URL="https://enjoyhub-back-production.up.railway.app"

DB_CONNECTION="mysql"
DB_HOST="127.0.0.1"
DB_PORT="3306"
DB_DATABASE="enjoyhub"
DB_USERNAME="root"
DB_PASSWORD=""

GOOGLE_BOOKS_API_KEY="your_google_books_api_key_here"
OPENAI_API_KEY="your_openai_api_key_here"

FRONTEND_URL="http://localhost:4200"
📚 Seeders
Seeders are located in:

Código
database/seeders/Books/
Run all seeders
Código
php artisan db:seed
Run a specific seeder
Código
php artisan db:seed --class="Database\Seeders\Books\ScienceFictionBookSeeder"
Add a new seeder
Create the file:

Código
php artisan make:seeder MyNewBookSeeder
Add it to DatabaseSeeder.php

Run:

Código
php artisan db:seed
📡 API Endpoints
Below is the full list of API routes you provided, organized and documented.

🔐 Authentication
POST /register
Create a new user.

POST /login
Authenticate and receive a Sanctum token.

GET /me (auth:sanctum)
Get the authenticated user.

📘 Books
GET /books
List all books.

GET /books/{id}
Get a single book.

POST /books
Create a new book.

GET /books/by-emotion/{emotionId}
Get books filtered by emotion.

😊 Emotions
GET /emotions
List all emotions.

📥 Book Import
POST /books/import/random-genre
Import a random book from a random genre using Google Books.

👤 Users
GET /users
List all users.

PATCH /users/{userId}/icon
Update profile icon.

PATCH /users/{userId}/profile
Update profile info.

PATCH /users/{userId}/password
Update password.

GET /users/{id}/lists
Get all lists for a user.

📝 Lists
POST /users/{userId}/lists
Create a list.

PATCH /lists/{listId}
Update a list.

DELETE /lists/{listId}
Delete a list.

📌 List Items
GET /lists/{listId}/items
Get items in a list.

POST /lists/{listId}/items
Add item to list.

DELETE /lists/{listId}/items/{contentId}
Remove item from list.

🚫 Discarded Content
POST /users/{userId}/discarded/{contentId}
Add content to discarded list.

GET /users/{userId}/discarded
Get discarded content.

🤖 Recommendations
POST /recommendations
Get a book recommendation (OpenAI-powered).

📨 Contact
POST /contact
Send a contact message.

🛠️ Admin (auth:sanctum)
GET /admin/users
List all users.

PATCH /admin/users/{userId}
Update user.

GET /admin/contact-messages
List contact messages.

POST /admin/import-books
Import books manually.

🧪 Testing
Run the full test suite:

Código
php artisan test
🔄 CI/CD
The README will document CI/CD based on the files inside the repo.
(If the repo contains GitHub Actions workflows, I will describe them automatically.)

👥 Team
Team Leader Frontend  
Asier de Blas
📧 asierdeblas@gmail.com

Team Leader Backend  
Valentina Noreña
📧 valenlovecrafts@gmail.com

📄 License
This project is distributed with no license.
All rights reserved by the authors.