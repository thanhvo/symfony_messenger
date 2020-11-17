The purpose of this project is to implement Symfony messenger for GFG Seller Center which should be able to produce and
consume the messages from Amazon SQS queue. The new Symfony messenger will replace the currently existing Gearman workers framework. 

The basic setup to run the application:

1. Use the latest PHP release (7.4) and the latest Symfony release (5.1)
2. Get the project from Github 
    https://github.com/GFG/symfony_workers
3. Create an AWS SQS queue, an AWS test user who has full permissions on AWS SQS queues. Add the credentials of the user
and the information of the queue to .env or env.local script the home directory of the project.
    AWS_KEY=xxx
    AWS_SECRET=xxx
    AWS_REGION=xxx
    AWS_TOKEN=xxx
    AWS_TOPIC_ARN=xxx
    Then, update the environment with the following command
    php bin/console debug:container --env-vars   
4. Recompile the project
    composer dump-autoload --optimize --no-dev --classmap-authoritative
5. Populate the queue with messages
    php bin/console app:message:dispatcher
6. Consume the messages from the SQS queue
    php bin/console messenger:consume    
