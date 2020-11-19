The purpose of this project is to implement Symfony messenger for GFG Seller Center which should be able to produce and
consume the messages from Amazon SQS queue. The new Symfony messenger will replace the currently existing Gearman workers framework. 

The basic setup to run the application:

1. Get the project from Github 
    https://github.com/GFG/symfony_workers
2. Create an AWS SQS queue, an AWS test user who has full permissions on AWS SQS queues. Add the credentials of the user
and the information of the queue to .env or env.local script the home directory of the project.  
    AWS_KEY=xxx  
    AWS_SECRET=xxx  
    AWS_REGION=xxx  
    AWS_TOKEN=xxx  
    AWS_TOPIC_ARN=xxx  
    Then, update the environment with the following command  
    php bin/console debug:container --env-vars   
4. Build a docker container for the project  
    docker-compose up  
5. Log in to the container and go to the home directory  
    docker exec -t -i symfony_workers_symfony_messenger_1 /bin/bash  
    cd /home/gfg/symfony_workers    
6. Populate the queue with messages  
    php bin/console app:message:dispatcher
7. Consume the messages from the SQS queue  
    php bin/console messenger:consume    
