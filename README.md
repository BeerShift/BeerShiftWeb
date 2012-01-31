OpenShift - BeerShift Web Application

This repository is designed to be used with http://openshift.redhat.com/
applications.  To use, just follow the quickstart below.

Quickstart
==========

1) Create an account at http://openshift.redhat.com/

2) Create a php-5.3 application and attach mongodb to it:

    rhc-create-app -a beershift -t php-5.3
    rhc-ctl-app -a beershift -e add-mongodb-2.0

3) Add this upstream repo

    cd beershift
    git remote add upstream -m master git://github.com/gshipley/BeerShiftWeb.git
    git pull -s recursive -X theirs upstream master

4) Then push the repo upstream

    git push

5) That's it, you can now browse to your application at:

    http://beershift-$yourNamespace.rhcloud.com

