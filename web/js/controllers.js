var estimateMe = angular.module('estimateMe', []);
var QUESTIONS_COUNT = 10;

estimateMe.controller('MainController', function ($scope, $http) {
    var questionsCounter = 0,
        submittedAnswers = [],
        ajaxLoader;


    ajaxLoader = function () {
        $http.get('questions/' + questionsCounter).success(function (data) {
            console.log(data);

            $scope.question = data.question;
            $scope.answers = data.answers;
        });
    };

    $scope.formData = {};

    $scope.submit = function () {
        submittedAnswers.push($scope.formData.submittedAnswer);

        if (submittedAnswers.length < QUESTIONS_COUNT) {
            questionsCounter++;

            ajaxLoader();
        } else {
            $http.post('answer/', submittedAnswers);
        }
    };

    ajaxLoader();
});
