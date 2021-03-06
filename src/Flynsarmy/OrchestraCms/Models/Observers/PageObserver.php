<?php namespace Flynsarmy\OrchestraCms\Models\Observers;

use Auth;
use Orchestra\Theme;

class PageObserver extends CmsModelObserver
{
	public function creating($model)
	{
		if ( !$model->user_id ) $model->user_id = Auth::user()->id;
		if ( !$model->theme ) $model->theme = Theme::getTheme();
	}

	public function saving($model)
	{
		$this->saveContent($model);
	}

	public function deleting($model)
	{
		$this->deleteContent($model);
	}
}