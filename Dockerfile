FROM mediawiki:1.39
RUN apt-get update
RUN apt-get install -yy --no-install-recommends python3 python3-launchpadlib 
RUN apt-get update && apt install -y software-properties-common 
RUN apt-get install -yy --no-install-recommends python3-pip unzip 
RUN pip3 install --break-system-packages Pygments 
RUN pecl install acpu igbinary
RUN apt-get purge -yy python3-pip 
RUN apt-get autoremove -yy 
RUN rm -rf /var/lib/apt/lists/*
RUN pear install --alldeps mail net_smtp

#RUN rm -rf /var/www/html/* && tar -c -C /usr/src/mediawiki . | tar -x -C /var/www/html
COPY DynamicPageList3-REL1_39 /var/www/html/extensions/DynamicPageList3/
COPY Loops /var/www/html/extensions/Loops/
COPY Variables /var/www/html/extensions/Variables/
COPY SyntaxHighlight_GeSHi /var/www/html/extensions/
COPY TabberNeue /var/www/html/extensions/TabberNeue
ADD UserMerge*.tar.gz /var/www/html/extensions/
COPY logos /var/www/html/logos/
COPY favicon.ico LocalSettings.php /var/www/html/
COPY .htaccess /var/www/html/
COPY mediawiki-skins-Citizen-main /var/www/html/skins/Citizen
RUN sed -ri \
		-e 's!^(\s*LogLevel)\s+\S+!\1 info!g' \
		"/etc/apache2/apache2.conf"
EXPOSE 80
