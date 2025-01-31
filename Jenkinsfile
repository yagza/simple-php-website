node {    
    def app     
    stage('Clone repository') {               
        checkout scm    
    }     
    
    stage('Build image') {         
        app = docker.build("yagza/simple-php-site-new")    
    }     
    
    stage('Test image') {           
        app.inside {            
            sh 'echo "Tests passed"'        
        }    
    }
    
    stage('Push image') {
        docker.withRegistry('https://registry.hub.docker.com', 'docker-hub') {            
        app.push("${env.BUILD_NUMBER}")            
        app.push("latest")        
        }    
    }
}