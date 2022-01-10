<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('repertoire.event_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="event">{{ trans('cruds.repertoire.fields.event') }}</label>
        <x-select-list class="form-control" required id="event" name="event" :options="$this->listsForFields['event']" wire:model="repertoire.event_id" />
        <div class="validation-message">
            {{ $errors->first('repertoire.event_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.repertoire.fields.event_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('repertoire.ensemble_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="ensemble">{{ trans('cruds.repertoire.fields.ensemble') }}</label>
        <x-select-list class="form-control" required id="ensemble" name="ensemble" :options="$this->listsForFields['ensemble']" wire:model="repertoire.ensemble_id" />
        <div class="validation-message">
            {{ $errors->first('repertoire.ensemble_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.repertoire.fields.ensemble_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('repertoire.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.repertoire.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="repertoire.title">
        <div class="validation-message">
            {{ $errors->first('repertoire.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.repertoire.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('repertoire.subtitle') ? 'invalid' : '' }}">
        <label class="form-label" for="subtitle">{{ trans('cruds.repertoire.fields.subtitle') }}</label>
        <input class="form-control" type="text" name="subtitle" id="subtitle" wire:model.defer="repertoire.subtitle">
        <div class="validation-message">
            {{ $errors->first('repertoire.subtitle') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.repertoire.fields.subtitle_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('repertoire.duration') ? 'invalid' : '' }}">
        <label class="form-label required" for="duration">{{ trans('cruds.repertoire.fields.duration') }}</label>
        <x-date-picker class="form-control" required wire:model="repertoire.duration" id="duration" name="duration" picker="time" />
        <div class="validation-message">
            {{ $errors->first('repertoire.duration') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.repertoire.fields.duration_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('repertoire.movements') ? 'invalid' : '' }}">
        <label class="form-label" for="movements">{{ trans('cruds.repertoire.fields.movements') }}</label>
        <textarea class="form-control" name="movements" id="movements" wire:model.defer="repertoire.movements" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('repertoire.movements') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.repertoire.fields.movements_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('repertoire.composer') ? 'invalid' : '' }}">
        <label class="form-label" for="composer">{{ trans('cruds.repertoire.fields.composer') }}</label>
        <input class="form-control" type="text" name="composer" id="composer" wire:model.defer="repertoire.composer">
        <div class="validation-message">
            {{ $errors->first('repertoire.composer') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.repertoire.fields.composer_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('repertoire.arranger') ? 'invalid' : '' }}">
        <label class="form-label" for="arranger">{{ trans('cruds.repertoire.fields.arranger') }}</label>
        <input class="form-control" type="text" name="arranger" id="arranger" wire:model.defer="repertoire.arranger">
        <div class="validation-message">
            {{ $errors->first('repertoire.arranger') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.repertoire.fields.arranger_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('repertoire.lyricist') ? 'invalid' : '' }}">
        <label class="form-label" for="lyricist">{{ trans('cruds.repertoire.fields.lyricist') }}</label>
        <input class="form-control" type="text" name="lyricist" id="lyricist" wire:model.defer="repertoire.lyricist">
        <div class="validation-message">
            {{ $errors->first('repertoire.lyricist') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.repertoire.fields.lyricist_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('repertoire.choreographer') ? 'invalid' : '' }}">
        <label class="form-label" for="choreographer">{{ trans('cruds.repertoire.fields.choreographer') }}</label>
        <input class="form-control" type="text" name="choreographer" id="choreographer" wire:model.defer="repertoire.choreographer">
        <div class="validation-message">
            {{ $errors->first('repertoire.choreographer') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.repertoire.fields.choreographer_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('repertoire.comments') ? 'invalid' : '' }}">
        <label class="form-label" for="comments">{{ trans('cruds.repertoire.fields.comments') }}</label>
        <input class="form-control" type="text" name="comments" id="comments" wire:model.defer="repertoire.comments">
        <div class="validation-message">
            {{ $errors->first('repertoire.comments') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.repertoire.fields.comments_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.repertoires.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>