import 'package:flutter/foundation.dart';
import '../models/task.dart';
import '../services/api_service.dart';

class TaskProvider with ChangeNotifier {
  List<Task> _tasks = [];
  bool _isLoading = false;
  String? _error;

  List<Task> get tasks => _tasks;
  bool get isLoading => _isLoading;
  String? get error => _error;

  List<Task> get completedTasks => _tasks.where((task) => task.completed).toList();
  List<Task> get pendingTasks => _tasks.where((task) => !task.completed).toList();

  // Load all tasks
  Future<void> loadTasks() async {
    _setLoading(true);
    _clearError();

    try {
      _tasks = await ApiService.getTasks();
    } catch (e) {
      String errorMessage = e.toString();
      if (errorMessage.contains('SocketException') || 
          errorMessage.contains('Connection refused') ||
          errorMessage.contains('server unavailable')) {
        _setError('Cannot connect to server. Please check:\n'
                 '1. Laravel server is running (php artisan serve)\n'
                 '2. Server is accessible at http://127.0.0.1:8000\n'
                 '3. Network connection is available\n'
                 '4. For Android: Using 10.0.2.2 for emulator');
      } else {
        _setError(errorMessage);
      }
    } finally {
      _setLoading(false);
    }
  }

  // Add a new task
  Future<void> addTask(Task task) async {
    _clearError();

    try {
      final newTask = await ApiService.createTask(task);
      _tasks.insert(0, newTask);
      notifyListeners();
    } catch (e) {
      _setError(e.toString());
    }
  }

  // Update a task
  Future<void> updateTask(Task task) async {
    _clearError();

    try {
      final updatedTask = await ApiService.updateTask(task);
      final index = _tasks.indexWhere((t) => t.id == task.id);
      if (index != -1) {
        _tasks[index] = updatedTask;
        notifyListeners();
      }
    } catch (e) {
      _setError(e.toString());
    }
  }

  // Delete a task
  Future<void> deleteTask(int taskId) async {
    _clearError();

    try {
      await ApiService.deleteTask(taskId);
      _tasks.removeWhere((task) => task.id == taskId);
      notifyListeners();
    } catch (e) {
      _setError(e.toString());
    }
  }

  // Toggle task completion
  Future<void> toggleTaskComplete(int taskId) async {
    _clearError();

    try {
      final updatedTask = await ApiService.toggleTaskComplete(taskId);
      final index = _tasks.indexWhere((t) => t.id == taskId);
      if (index != -1) {
        _tasks[index] = updatedTask;
        notifyListeners();
      }
    } catch (e) {
      _setError(e.toString());
    }
  }

  void _setLoading(bool loading) {
    _isLoading = loading;
    notifyListeners();
  }

  void _setError(String error) {
    _error = error;
    notifyListeners();
  }

  void _clearError() {
    _error = null;
  }
}
