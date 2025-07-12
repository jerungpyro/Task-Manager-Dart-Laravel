@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">
                    <i class="fas fa-eye me-2"></i>Task Details
                </h4>
                <div>
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-primary me-2">
                        <i class="fas fa-edit me-1"></i>Edit
                    </a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" 
                                onclick="return confirm('Are you sure you want to delete this task?')">
                            <i class="fas fa-trash me-1"></i>Delete
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <!-- Task Status -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="d-flex align-items-center">
                            <form action="{{ route('tasks.toggle', $task) }}" method="POST" class="me-3">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-outline-secondary">
                                    @if($task->completed)
                                        <i class="fas fa-check-circle text-success fa-2x"></i>
                                    @else
                                        <i class="far fa-circle fa-2x"></i>
                                    @endif
                                </button>
                            </form>
                            <div>
                                <h2 class="@if($task->completed) task-completed @endif">{{ $task->title }}</h2>
                                <p class="mb-0">
                                    @if($task->completed)
                                        <span class="badge bg-success">
                                            <i class="fas fa-check me-1"></i>Completed
                                        </span>
                                    @else
                                        <span class="badge bg-warning">
                                            <i class="fas fa-clock me-1"></i>Pending
                                        </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Task Details -->
                <div class="row">
                    <div class="col-md-6">
                        <h5><i class="fas fa-info-circle me-2"></i>Description</h5>
                        @if($task->description)
                            <p class="text-muted @if($task->completed) task-completed @endif">
                                {{ $task->description }}
                            </p>
                        @else
                            <p class="text-muted fst-italic">No description provided.</p>
                        @endif
                    </div>
                    
                    <div class="col-md-6">
                        <h5><i class="fas fa-tags me-2"></i>Task Information</h5>
                        
                        <!-- Priority -->
                        <div class="mb-3">
                            <strong>Priority:</strong>
                            <span class="badge priority-{{ $task->priority }} ms-2">
                                {{ ucfirst($task->priority) }} Priority
                            </span>
                        </div>
                        
                        <!-- Due Date -->
                        <div class="mb-3">
                            <strong>Due Date:</strong>
                            @if($task->due_date)
                                <span class="ms-2">
                                    @if($task->due_date->isPast() && !$task->completed)
                                        <span class="badge bg-danger">
                                            <i class="fas fa-exclamation-triangle me-1"></i>
                                            Overdue ({{ $task->due_date->format('M j, Y') }})
                                        </span>
                                    @elseif($task->due_date->isToday())
                                        <span class="badge bg-warning">
                                            <i class="fas fa-calendar-day me-1"></i>
                                            Due Today
                                        </span>
                                    @else
                                        <span class="badge bg-info">
                                            <i class="fas fa-calendar me-1"></i>
                                            {{ $task->due_date->format('M j, Y') }}
                                        </span>
                                    @endif
                                </span>
                            @else
                                <span class="text-muted ms-2">No due date set</span>
                            @endif
                        </div>
                        
                        <!-- Created -->
                        <div class="mb-3">
                            <strong>Created:</strong>
                            <span class="ms-2">{{ $task->created_at->format('M j, Y \a\t g:i A') }}</span>
                            <small class="text-muted d-block">{{ $task->created_at->diffForHumans() }}</small>
                        </div>
                        
                        <!-- Last Updated -->
                        @if($task->updated_at != $task->created_at)
                            <div class="mb-3">
                                <strong>Last Updated:</strong>
                                <span class="ms-2">{{ $task->updated_at->format('M j, Y \a\t g:i A') }}</span>
                                <small class="text-muted d-block">{{ $task->updated_at->diffForHumans() }}</small>
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Actions -->
                <hr class="my-4">
                <div class="text-center">
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary me-2">
                        <i class="fas fa-arrow-left me-1"></i>Back to Tasks
                    </a>
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-1"></i>Edit Task
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
