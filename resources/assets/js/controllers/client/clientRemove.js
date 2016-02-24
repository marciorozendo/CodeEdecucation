/**
 * Created by Marcio on 23/02/2016.
 */
angular.module('app.controllers')
    .controller('ClientRemoveController',
    ['$scope', '$location', '$routeParams','Client',
        function ($scope, $location, $routeParams,Client) {
        $scope.client = Client.get({id: $routeParams.id});

        $scope.remove = function () {
            $scope.client.$delete().then(function(){
                $location.path('/clients');
            });

        }

    }]);