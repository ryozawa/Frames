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
    {id: 1, name: 'FAQ_A', create_user: 'user AAA', create_date: '非公開'},
    {id: 2, name: 'FAQ_B', create_user: 'user BBB', create_date: '公開'},
    {id: 3, name: 'FAQ_C', create_user: 'user CCC', create_date: '2015/01/03 ～ 2015/02/28'},
    {id: 4, name: 'FAQ_D', create_user: 'user DDD', create_date: '非公開'},
    {id: 5, name: 'よくある質問2015年版', create_user: 'user EEE', create_date: '公開'}
  ];

  $scope.isPublished = true;
  $scope.isStartDate = false;
  $scope.isEndDate = false;
  $scope.frameType = 'default';

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

  $scope.selectLabel = function(labelType){
    $scope.frameType = labelType;
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
