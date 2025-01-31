node {    
    def MyApp     
    stage('Build image') {         
        MyApp = docker.build("yagza/simple-php-site-new")    
    }     
    
    stage('Test image') {           
        MyApp.inside {            
            sh 'echo "Installing curl..."'
            sh 'apk update && apk add curl'
            sh 'echo "Requesting the first page"...'
            sh 'curl localhost:8080'
        }    
    }
    
    stage('Push image') {
        docker.withRegistry('https://registry.hub.docker.com', 'docker-hub') {            
        MyApp.push("${env.BUILD_NUMBER}")            
        MyApp.push("latest")        
        }    
    }

    stage('Run Image') {
        MyApp.run('--name php-simple -p 8080:8080')
    }

}