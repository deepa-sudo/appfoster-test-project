
"use strict";
document.addEventListener( 'DOMContentLoaded', () => {
    
    if ( typeof appfoster_object === 'undefined' ) {
        return false;
    }
    var appfosterWarapper = document.querySelector( '.appfoster-wrapper' );
    var htmlData = '';
    if ( appfosterWarapper ) {
        const __url = 'https://raw.githubusercontent.com/LearnWebCode/json-example/master/animals-1.json';
    
        const __arrayReduce = ( dataArray, title ) => {
            var index = 0;
            var reduceArray = dataArray.reduce(function( accumulator, currentValue )  {
                if ( index === 0 ) {
                    accumulator = '<li>' + accumulator + '</li>';
                }
                index++;
                return accumulator + '<li>' + currentValue + '</li>'
            });
            return '<div class="appfoster-list-container">' + title + '<ul class="appfoster-list-wrapper">' + reduceArray + '</ul></div>' ;
        }

        htmlData = '<table class="appfoster-table" border="1"><tr><th>'+ appfoster_object.name +'</th><th>' + appfoster_object.species+ '</th><th>' + appfoster_object.food+ '</th></tr><tbody>';

        fetch(__url)
        .then(res => res.json())
        .then((data) => {
            data.forEach(element => {
                htmlData += '<tr><td>' + element.name + '</td><td>' + element.species + '</td><td>';
                if ( element.foods.dislikes.length ) {
                    htmlData +=  __arrayReduce( element.foods.dislikes, appfoster_object.dislike );
                }
                if ( element.foods.likes.length ) {
                    htmlData +=  __arrayReduce( element.foods.likes, appfoster_object.like  );
                }
                htmlData + '</td></tr>';
            });
            htmlData += '</tbody></table>'
            appfosterWarapper.innerHTML = htmlData;
        })
        .catch(err => { 
            appfosterWarapper.innerHTML = err;
         });
    }
});