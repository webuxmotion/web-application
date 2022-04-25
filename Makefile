up:
	docker-compose up -d

remove-ps:
	docker rm -f $$(docker ps -a -q)

remove-images: 
	docker rmi --force $$(docker images -a -q)

chmod:
	chmod -R 777 tmp/