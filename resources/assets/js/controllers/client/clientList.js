/**
 * Created by Marcio on 23/02/2016.
 */
angular.module('app.controllers')
    .controller('ClientListController', ['$scope','Client', function ($scope,Client) {
        $scope.clients = Client.query();

    }]);