## Payment Gateway - Customer Transactions API
##### Description
The project was based on the following [functional requirements](https://drive.google.com/open?id=1jQEUTrw4W9aQXhDFAdZTcaY6tDzcWfiX).
All the functional specification has been met. When landing on the `/customers/registration` route , 
the user will be made available  
This implementation was carried through with the following technical specifications:
- PHP Framework Laravel 5.8
- MariaDb 10.3 but Mysql 5.7 could be used as well.
- Laravel builtin Web Server.


###Installation

After cloning the repository on the master branch, carry on the following
- Cloning the repository.
- cd into payment-getaway directory.
- execute `composer install` (https://getcomposer.org/) if not installed.
- Create a database with name 'payment-gateway' and adjust the databse host, port, username, password variables on the `.env.example`.
- rename `.env.example` to `.env`.
- execute `php artisan migrate:install`.
- execute `php artisan migrate`.
- run local server `php artisan serve` and follow the link. 
- If you are having issues setting up, a docker configuration could follow up if needed. Please email`redilinxa@gmail.com` for support.


###Usage
- Open the route `/customers/registration`.
- Follow the flow until the end. if you have not completed all the flow, the system will remember you last position.
- After the completion of the flow, please refresh to go to first step again.
- Graphical interface screenshots of the project. [Link](https://drive.google.com/drive/folders/12qyLaG3Zs_9iYHifPWEhdj4NwLubvFjb)


###Improvements
- In a much bigger application i would have created separate routes for the steps 
to keep better track of the user flow and generate statistics.
- Transaction based database records creation.
- Detailed exception handling and Validations.
- Adjusting docker file for development portability.

Overall i can say that for the existing specification the application does what is intended.
The means behind the completion of this task was for me to be able to show as much diverse implementation logic and technologies
in order for you to be able to understand my existing knowledge as a developer.
I wanted to deliver a solution which could be as much decoupled and reusable as possible.
I used Laravel as it is among the most popular frameworks available. However i could have used any other framework with just a little more time time spare.
Looking forward to you reviews.
