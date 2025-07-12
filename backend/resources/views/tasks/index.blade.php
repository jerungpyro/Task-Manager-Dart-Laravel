@extends('layouts.app')

@section('title', 'Task Manager - Dashboard')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h1 class="h3 mb-3">
            <i class="fas fa-tachometer-alt me-2"></i>Task Dashboard
        </h1>
    </div>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-md-3 col-6 mb-3">
        <div class="card stat-card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-title">Total Tasks</h6>
                        <h3 class="mb-0">{{ $totalCount }}</h3>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-tasks fa-2x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-6 mb-3">
        <div class="card stat-card bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-title">Pending</h6>
                        <h3 class="mb-0">{{ $pendingCount }}</h3>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-clock fa-2x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-6 mb-3">
        <div class="card stat-card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-title">Completed</h6>
                        <h3 class="mb-0">{{ $completedCount }}</h3>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-check-circle fa-2x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-6 mb-3">
        <div class="card stat-card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-title">Progress</h6>
                        <h3 class="mb-0">{{ $totalCount > 0 ? round(($completedCount / $totalCount) * 100) : 0 }}%</h3>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-chart-pie fa-2x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Task Management Header -->
<div class="row mb-3">
    <div class="col-md-8">
        <h2 class="h4">
            <i class="fas fa-list me-2"></i>All Tasks
        </h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i>Add New Task
        </a>
    </div>
</div>

<!-- Tasks List -->
<div class="row">
    <div class="col-12">
        @if($tasks->count() > 0)
            @foreach($tasks as $task)
                <div class="card task-card @if($task->due_date) @if($task->due_date->isPast() && !$task->completed) overdue @elseif($task->due_date->isToday()) due-today @endif @endif">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <div class="d-flex align-items-center">
                                    <!-- Task Toggle -->
                                    <form action="{{ route('tasks.toggle', $task) }}" method="POST" class="me-3">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">
                                            @if($task->completed)
                                                <i class="fas fa-check-circle text-success"></i>
                                            @else
                                                <i class="far fa-circle"></i>
                                            @endif
                                        </button>
                                    </form>
                                    
                                    <div class="flex-grow-1">
                                        <h5 class="card-title mb-1 @if($task->completed) task-completed @endif">
                                            {{ $task->title }}
                                        </h5>
                                        
                                        @if($task->description)
                                            <p class="card-text text-muted @if($task->completed) task-completed @endif">
                                                {{ Str::limit($task->description, 100) }}
                                            </p>
                                        @endif
                                        
                                        <div class="d-flex align-items-center flex-wrap">
                                            <!-- Priority Badge -->
                                            <span class="badge priority-{{ $task->priority }} me-2 mb-1">
                                                {{ ucfirst($task->priority) }} Priority
                                            </span>
                                            
                                            <!-- Due Date -->
                                            @if($task->due_date)
                                                <span class="badge 
                                                    @if($task->due_date->isPast() && !$task->completed) 
                                                        bg-danger 
                                                    @elseif($task->due_date->isToday()) 
                                                        bg-warning 
                                                    @else 
                                                        bg-info 
                                                    @endif 
                                                    me-2 mb-1">
                                                    <i class="fas fa-calendar me-1"></i>
                                                    @if($task->due_date->isPast() && !$task->completed)
                                                        Overdue ({{ $task->due_date->format('M j, Y') }})
                                                    @elseif($task->due_date->isToday())
                                                        Due Today
                                                    @else
                                                        Due {{ $task->due_date->format('M j, Y') }}
                                                    @endif
                                                </span>
                                            @endif
                                            
                                            <!-- Created Date -->
                                            <small class="text-muted">
                                                Created {{ $task->created_at->diffForHumans() }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="task-actions text-end">
                                    <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-outline-info me-1">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-primary me-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                onclick="return confirm('Are you sure you want to delete this task?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $tasks->links() }}
            </div>
        @else
            <div class="card">
                <div class="card-body text-center py-5">
                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                    <h4 class="text-muted">No tasks found</h4>
                    <p class="text-muted">Get started by creating your first task!</p>
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i>Create First Task
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
