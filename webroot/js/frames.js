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


  $scope.frame = {};

  $scope.frameInit = function(data){
    $scope.frame = data.frame;
    $scope.frame.type = 'default';
  }

  $scope.selectLabel = function(labelType){
    $scope.frame.type = labelType;
  };

  $scope.blocks = [
    {id: 1, name: 'FAQ_A', isPublished: '非公開', modified: '2015/01/01'},
    {id: 2, name: 'FAQ_B', isPublished: '公開', modified: '2015/02/01'},
    {id: 3, name: 'FAQ_C', isPublished: '2015/01/03 ～ 2015/02/28', modified: '2015/01/02'},
    {id: 4, name: 'FAQ_D', isPublished: '非公開', modified: '2015/03/01'},
    {id: 5, name: 'よくある質問2015年版', isPublished: '公開', modified: '2015/01/03'}
  ];

  $scope.categories = [
    {id: 1, name: 'カテゴリA'},
    {id: 2, name: 'カテゴリB'},
    {id: 3, name: 'カテゴリC'},
    {id: 4, name: 'カテゴリD'},
    {id: 5, name: 'カテゴリE'}
  ];


  $scope.isPublished = true;
  $scope.isPublishedPeriod = false;
  $scope.isStartDate = false;
  $scope.isEndDate = false;
  $scope.publishedStart = '2015-03-23T15:00:00.000Z';

  $scope.orderByField = 'name';
  $scope.reverseSort = false;

  $scope.orderBlock = function(name){
    $scope.orderByField = name;
    $scope.reverseSort = !$scope.reverseSort;
  }

  $scope.dateOpen = function($event, type){
    $event.stopPropagation();
    if (type === 'start') {
      $scope.isStartDate = !$scope.isStartDate;
    } else if (type === 'end') {
      $scope.isEndDate = !$scope.isEndDate;
    }
  };

  $scope.displayBlock = function(blockName){
    dlg = dialogs.confirm('Confirm', blockName + 'をフレーム表示しますか？');
  };


  $scope.deleteBlock = function(blockName){
    dlg = dialogs.confirm('Confirm', blockName + 'を削除します。よろしいですか？');
  };
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
