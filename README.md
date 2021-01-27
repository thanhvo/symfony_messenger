# Symfony Workers
The purpose of this project is to implement Symfony messenger for GFG Seller Center which should be able to produce and
consume the messages from Amazon SQS queue. The new Symfony messenger will replace the currently existing Gearman workers framework. 

## Techonologies
Project is created with:
* PHP version: 8.0  
* Symfony messenger version: 5.1    
* Serverless: https://www.serverless.com  
* Bref: https://bref.sh    
* AWS Lambda  
* Docker  

## Installation 
Create an AWS SQS queue, an AWS test user who has full permissions on AWS SQS queues. Add the credentials of the user
and the information of the queue to .env or env.local script at the home directory of the project.  
```
AWS_KEY=xxx
AWS_SECRET=xxx
AWS_REGION=xxx 
AWS_TOKEN=xxx
AWS_TOPIC_ARN=xxx
```  
Then, update the environment with the following command  
`php bin/console debug:container --env-vars`   

## Docker deployment
1. Build a docker container for the project  
    `docker-compose up`  
2. Log in to the container and go to the home directory  
    ```
    docker exec -t -i symfony_workers_symfony_messenger_1 /bin/bash  
    cd /home/gfg/symfony_workers  
   ```  
3. Populate the queue with messages  
    `php bin/console app:message:dispatcher`
4. Consume the messages from the SQS queue  
    `php bin/console messenger:consume`   
    
## AWS Lambda deployment
We use Serverless Framework and Bref to deploy our Symfony application to AWS Lambda. Serverless provides a painless way
to port everything to AWS Lambda. Just run Makefile command in the home directory.  
   `make`   
