/* js/services/time.js */
    
(function() {
    
    'use strict';

    angular
        .module('mainWebsite')
        .factory('time', time);

        function time($resource) {

            // ngResource call to our static data
            var Time = $resource('data/time.json');

            function getTime() {
                console.log("test");
            }

            return {
                getTime: getTime,
            }
        }
})();