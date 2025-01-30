pipeline {
    agent { 
        node {
            label 'vm'
            }
      }
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
        stage('build') {
            steps {
                echo "Building.."
                sh '''
                docker build . -t yagza/simple-php-site:latest
                '''
            }
        }
        stage('image_push') {
            steps {
                echo "pushing.."
                sh '''
                docker image ls
                '''
            }
        }
        stage('deploy') {
            steps {
                echo 'Deploying....'
                sh '''
                echo "doing deploy stuff.."
                '''
            }
        }
    }
}
