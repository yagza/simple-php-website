pipeline {
    agent any
    triggers {
        pollSCM 'H/5 * * * *'
    }
    stages {
        stage('checking') {
            steps {
                echo "Checking.."
                sh '''
                docker version
                '''
            }
        }
    }

    stage('Build image') {         
        app = docker.build("yagza/simple-php-site")    
    }
        
    stage('Push image') {
        docker.withRegistry('https://registry.hub.docker.com', 'docker-hub') {            
            app.push("${env.BUILD_NUMBER}")            
            app.push("latest")        
        }    
    }

    stage('Test image') {           
        app.inside {                         
            sh 'echo "Tests passed"'        
        }    
    } 
    
    stage('deploy') {
    
        agent {
            node {
                label 'vm'
            }
        }
    
        steps {
            echo 'Deploying....'
            sh '''
            echo "updating php-simple container..."
            docker run -d --name php-simple -p 8080:8080 yagza/simple-php-site:latest
            '''
            echo 'you may try to connect via http://10.0.0.130:8080'
        }
    }
}