/**
 * Frames JavaScript
 *
 * @author kteraguchi@commonsnet.org (Kohei Teraguchi)
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

// * @copyright Copyright 2014, NetCommons Project
// Invalid JsDoc tag: copyright

NetCommonsApp.requires.push('dialogs.main');
NetCommonsApp.controller('FramesController', function($scope, $http, dialogs) {

  /**
   * scope values
   */
  $scope.deleted = false;

  /**
   * @param {number} frameId
   * @return {void}
   */
  $scope.delete = function(frameId) {
    var message = 'Do you want to delete the frame?<br />' +
                  '(It should use defined language.)';
    dialogs.confirm(undefined, message)
      .result.then(
        function(yes) {
          $http.delete('/frames/frames/' + frameId.toString())
            .success(function(data, status, headers, config) {
                $scope.deleted = true;
              })
            .error(function(data, status, headers, config) {
                alert(status);  // It should be error code
              });
        });
  };

/*** TODO:フレーム設定機能↓ ***/

  $scope.blocks = [
    'FAQ A',
    'FAQ B',
    'FAQ C',
    'FAQ D',
    'よくある質問'
  ];

  $scope.status = {
    isopen: false
  };

  $scope.toggleDropdown = function($event) {
    $event.preventDefault();
    $event.stopPropagation();
    $scope.status.isopen = !$scope.status.isopen;
  };

  $scope.isPublished = true;

  $scope.isStartDate = false;
  $scope.isEndDate = false;

  $scope.dateOpen = function($event, type){
    $event.stopPropagation();
    if (type === 'start') {
      $scope.isStartDate = !$scope.isStartDate;
    } else if (type === 'end') {
      $scope.isEndDate = !$scope.isEndDate;
    }
  }

})
.config(function(datepickerConfig, datepickerPopupConfig) {
  angular.extend(datepickerConfig, {
    formatMonth: 'yyyy / MM',
    formatDayTitle: 'yyyy / MM',
    showWeeks: false
  });
  angular.extend(datepickerPopupConfig, {
    datepickerPopup: 'yyyy/MM/dd HH:mm',
    showButtonBar: false
  });
});
