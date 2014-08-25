<?php

class TodoListController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __consturct(){
		$this -> beforeFilter('csrf' , array('on' => ['post', 'put']));
	}

	public function index()
	{
		$todo_lists = TodoList::all();
		return View::make('todos/index') -> with('todo_lists', $todo_lists);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('todos/create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array('name' => array('required' , 'unique:todo_lists,name'));

		$validator = Validator::make(Input::all(), $rules);

		if($validator -> fails()){
			return Redirect::route('todos.create')->withErrors($validator)->withInput();
		}
		else{
			$list = new TodoList();
			$list -> name =  Input::get('name');
			$list -> save();
			return Redirect::route('todos.index')->withMessage('List was created');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$list = TodoList::find($id);
		$items = $list -> listItems() -> get();
		return View::make('todos.show') -> withList($list) -> withItems($items);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$list = TodoList::find($id);
		return View::make('todos/edit')->withList($list);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array('name' => array('required' , 'unique:todo_lists'));

		$validator = Validator::make(Input::all(), $rules);

		if($validator -> fails()){
			return Redirect::route('todos.edit', $id)->withErrors($validator)->withInput();
		}
		else{
			$list = TodoList::find($id);
			$list -> name =  Input::get('name');
			$list -> update();
			return Redirect::route('todos.index')->withMessage('List was updated');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
			$list = TodoList::find($id);
			$list -> delete();
			return Redirect::route('todos.index')->withMessage('List was delete');
	}


}
