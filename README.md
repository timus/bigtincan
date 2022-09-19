steps
1. Setup docker `docker-compose up`
2. In case the migration didnt run docker entry point run `bin/console doctrine:migrations:migrate`
3. Create short Url from long. 
``````
Login to docker shell and follow the steps below
1. Run the following command  
php bin/console create_url --url=http://www.demo.com --validtill=1
This will create url and short url automatically and you will get something like below
a9e9ff created 
2. Run the folowing route in browser
http://localhost/url/a9e9ff and you will be redirected to demo.com



         
         
               
             
        