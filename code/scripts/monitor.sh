#!/bin/bash
test="$(nc -w 3 -vz $1 $2 2>&1 |grep succeeded)"
if [ -z "$test" ];
then
        echo -e "DOWN"
else
        echo -e "UP" 
fi
#test