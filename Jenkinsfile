node {

    properties([
        pipelineTriggers([
            pollSCM('H/5 * * * *')
        ])
    ])

    def MyApp

    stage('Clone repository') {
        checkout scm
    }

    stage('Build image') {
        MyApp = docker.build("yagza/simple-php-site:${env.BUILD_NUMBER}")
    }
    
    stage('Test image') {
        MyApp.inside {
            sh 'echo "Requesting the first page"...'
            sh 'curl localhost:8080 -v'
            sh 'ls -la'
            sh 'pwd'
        }
    }
    
    stage('Push image') {
        docker.withRegistry('https://registry.hub.docker.com', 'docker-hub') {
        MyApp.push("${env.BUILD_NUMBER}")
        MyApp.push("latest")
        }
    }

    stage('Clear previous deploy') {
        agent {
            node {
                label 'vm'
                }
        }
        echo 'Removing php-simple container...'
        sh 'docker rm php-simple -f || true'
    }

    stage('Run Image') {
        MyApp.run('--name php-simple -p 8080:8080')
        echo 'you may try to connect via http://10.0.0.146:8080'
    }

}