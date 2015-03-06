<?php
/**
 * Frames Controller
 *
 * @property Frame $Frame
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('FramesAppController', 'Frames.Controller');

/**
 * Frames Controller
 *
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @package NetCommons\Frames\Controller
 */
class FramesController extends FramesAppController {

/**
 * uses
 *
 * @var array
 */
	public $uses = array('Frames.Frame');

/**
 * use component
 *
 * @var array
 */
	public $components = array(
			//'Security'
	);

/**
 * index method
 *
 * @param string $id frameId
 * @throws NotFoundException
 * @return void
 */
	public function index($id = null) {
		$frame = $this->Frame->findById($id);
		if (empty($frame)) {
			throw new NotFoundException();
		}

		$frame['Frame']['Plugin'] = $frame['Plugin'];
		$frame['Frame']['Language'] = $frame['Language'];
		unset($frame['Plugin'], $frame['Language']);
		$this->set('frames', array($frame['Frame']));
		// It probably doesn't needs index.ctp, but lower readability.
		//$this->render('Frames.Elements/render_frames');
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		//if (!$this->request->is('post')) {
		//	return;
		//}
		$this->request->onlyAllow('post');

		$this->Frame->create();

		// It should modify to use m17n on key and name
		$data['Frame'] = array_merge(
			$this->request->data,
			array(
				'room_id' => 1,
				'language_id' => 2,
				'key' => hash('sha256', 'テスト' . date('Y/m/d H:i:s')),
				'name' => 'テスト' . date('Y/m/d H:i:s'),
			)
		);

		if (!$this->Frame->saveFrame($data)) {
			//エラー処理
			return false;
		}

		$this->autoRender = false;
		$this->redirect('/setting/');
	}

/**
 * delete method
 *
 * @param string $id frameId
 * @throws NotFoundException
 * @return void
 */
	public function delete($id = null) {
		$this->Frame->id = $id;
		if (!$this->Frame->exists()) {
			throw new NotFoundException(__('Invalid frame'));
		}

		//$this->request->onlyAllow('post', 'delete');
		$this->request->onlyAllow('delete');
		if ($this->Frame->deleteFrame()) {
			return $this->flash(__('The frame has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The frame could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}

/**
 * edit method
 *
 * @param int $frameId frames.id
 * @return CakeResponse A response object containing the rendered view.
 */
	public function edit($frameId = 0) {
//		$this->_setFrame($this->viewVars['frameId']);
		if ($this->request->isPost()) {
			$data = $this->data;
			$data['Frame']['id'] = $frameId;
// TODO:Framesテーブルの修正が必要
unset($data['Frame']['type']);
			if (! $this->Frame->save($data)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}

			if (!$this->request->is('ajax')) {
				$this->redirect($this->request->referer());
			}
		}
	}}
