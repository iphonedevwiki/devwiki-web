# devwiki-web

### What is this? 

The source code required to build the docker image we use to run the iPhone Dev Wiki

If there are changes you'd like to see, extensions added, etc., you can file an issue or create a PR addressing them.

### Why?

It has historically been difficult to make suggestions, file issues, or contribute improvements to this project. 

It may also interest users to see the internals of the website, and after thorough evaluation and considerations in design and security, it was determined that it would not be a risk to website security to publish this, as it essentially
consists of standard mediawiki installation files you could generate yourself, alongside a combination of images, public extensions, and other standard items. 

### What's the CI For?

Authenticated pushes to the main branch of this repo will automatically build a docker image and land it in our registry. As an extra stopgap, these are manually validated before upgrading the website. 

### Can I copy this and make my own iPhoneDevWiki?

The goal of making this open source was to offer a path to contribute to this wiki's internals that does not involve downloading its entire database and duplicating it in your own wiki.

There are already difficulties regarding page maintainence, and splitting efforts via new forks with no intent of upstream contribution is just going to make that worse. 

You are obviously fully, legally free to do so regardless. 

### Can I nab this to set up my own wiki?

Sure? But I would reccomend starting clean with current year instructions.
