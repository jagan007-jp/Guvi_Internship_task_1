# Guvi_Internship_task_1

# User Registration and Profile Management System

## Flow

1. **Register**  
   - Users can sign up by providing their email and password.
   - Data is stored in a MySQL database.

2. **Login**  
   - Users can log in using the credentials they provided during registration.
   - On successful login, a session token is created and stored in Redis.
   - The user's email is stored in localStorage for session handling.

3. **Profile**  
   - After login, users are redirected to their profile page.
   - The profile page displays additional information: `name`, `age`, `date of birth (dob)`, and `contact number`.
   - Users can update their profile details.
   - Profile data is stored and managed using MongoDB.

---

### Tech Stack

- **Frontend**: HTML, CSS (Bootstrap), JavaScript (jQuery)
- **Backend**: PHP
- **Databases**: 
  - MySQL (for user authentication)
  - MongoDB (for profile data)
  - Redis (for session tokens)
# Guvi_Internship_task_1
