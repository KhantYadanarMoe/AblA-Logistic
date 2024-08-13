# AblA-Logistic

##Description 

- AlbA_Logistic is an ecommerce website built with HTML, CSS, Bootstrap, Javascript, PHP, and Laravel. It allows users to browse products, add products to cart, order, add products to wishlist, contact to the owner, check order-histories and order-process. The admin panel provides functionality for managing products, orders, contact-messages and users.


## Installation

1. Clone the repository:
   git clone https://github.com/KhantYadanarMoe/AblA-Logistic.git
   
2. Navigate to the project directory:
   cd AlbA-Logistic

3. Install dependencies:
   composer install
   npm install

4. Set up the environment file:
   cp .env.example .env

5. Generate an application key:
   php artisan key:generate

6. Run database migrations:
   php artisan migrate 

7. Serve the application:
   php artisan serve


#Usage

- Visit the home page at "http://127.0.0.1:8000"  
- Visit the about us page at "http://127.0.0.1:8000/about" to know more about the company
- Visit the products page at "http://127.0.0.1:8000/products" to see products
- Visit the contact us page at "http://127.0.0.1:8000/contact" to contact to the admin
- Visit the user-pf page at "http://127.0.0.1:8000/user-info" 
- Visit the wishlist page at "http://127.0.0.1:8000/wishlist" to see the products you added to wishlist
- Visit the order-history page at "http://127.0.0.1:8000/order-history" to see all of your orders

- Visit the admin dashboard page at "http://127.0.0.1:8000/admin" 
- Visit the products page at "http://127.0.0.1:8000/admin/products" to manage products
- Visit the orders page at "http://127.0.0.1:8000/admin/orders" to manage orders
- Visit the users page at "http://127.0.0.1:8000/admin/users" to see and search users
- Visit the contacts page at "http://127.0.0.1:8000/admin/contacts" to manage contact messages


# Admin Access

To access the admin features of the application, you need to set the `is_admin` column to `1` for a user account in the database. Here’s how you can do it:

1. **Access the Database:**
   - Use a database management tool like phpMyAdmin, MySQL Workbench, or a similar tool to access your database.

2. **Update the `is_admin` Column:**
   - Locate the `users` table.
   - Find the user account you want to give admin access to.
   - Change the `is_admin` column value from `0` to `1` for that user.

Example SQL query:  UPDATE users SET is_admin = 1 WHERE email = 'test@example.com';


# Features (For users)
- User authentication and authorization
- search and filtering function for products, wishlists
- Shopping cart functionality
- User info
- Wishlist
- Check order process
- Previous order history

# Features (For admins)
- Admin authentication and authorization
- search and filtering function for products, orders, users, contacts
- Products Management
- Orders Management
- Contact Messages Management


# License
All right for this project reserved to Khant.


# Contact
If you have any questions, feel free to reach out at khantyadanarmoe04@gmail.com.


  
