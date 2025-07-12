import 'dart:convert';
import 'dart:io';
import 'dart:async';
import 'package:flutter/foundation.dart';
import 'package:http/http.dart' as http;
import '../models/task.dart';

class ApiService {
  // Use different URLs for different platforms
  static String get baseUrl {
    if (kIsWeb) {
      return 'http://127.0.0.1:8000/api'; // For web
    } else if (Platform.isAndroid) {
      return 'http://10.0.2.2:8000/api'; // For Android emulator
    } else {
      return 'http://127.0.0.1:8000/api'; // For iOS simulator and other platforms
    }
  }
  
  static const Duration timeoutDuration = Duration(seconds: 10);

  // Get all tasks
  static Future<List<Task>> getTasks() async {
    try {
      final response = await http.get(
        Uri.parse('$baseUrl/tasks'),
        headers: {'Content-Type': 'application/json'},
      ).timeout(timeoutDuration);

      if (response.statusCode == 200) {
        List<dynamic> data = json.decode(response.body);
        return data.map((json) => Task.fromJson(json)).toList();
      } else {
        throw Exception('Failed to load tasks: ${response.statusCode}');
      }
    } on SocketException catch (e) {
      throw Exception('No internet connection or server unavailable: ${e.message}');
    } on TimeoutException catch (e) {
      throw Exception('Request timed out: ${e.message}');
    } catch (e) {
      throw Exception('Error loading tasks: $e');
    }
  }

  // Create a new task
  static Future<Task> createTask(Task task) async {
    try {
      final response = await http.post(
        Uri.parse('$baseUrl/tasks'),
        headers: {'Content-Type': 'application/json'},
        body: json.encode(task.toJson()),
      );

      if (response.statusCode == 201) {
        return Task.fromJson(json.decode(response.body));
      } else {
        throw Exception('Failed to create task');
      }
    } catch (e) {
      throw Exception('Error creating task: $e');
    }
  }

  // Update a task
  static Future<Task> updateTask(Task task) async {
    try {
      final response = await http.put(
        Uri.parse('$baseUrl/tasks/${task.id}'),
        headers: {'Content-Type': 'application/json'},
        body: json.encode(task.toJson()),
      );

      if (response.statusCode == 200) {
        return Task.fromJson(json.decode(response.body));
      } else {
        throw Exception('Failed to update task');
      }
    } catch (e) {
      throw Exception('Error updating task: $e');
    }
  }

  // Delete a task
  static Future<void> deleteTask(int taskId) async {
    try {
      final response = await http.delete(
        Uri.parse('$baseUrl/tasks/$taskId'),
        headers: {'Content-Type': 'application/json'},
      );

      if (response.statusCode != 200 && response.statusCode != 204) {
        throw Exception('Failed to delete task');
      }
    } catch (e) {
      throw Exception('Error deleting task: $e');
    }
  }

  // Toggle task completion
  static Future<Task> toggleTaskComplete(int taskId) async {
    try {
      final response = await http.patch(
        Uri.parse('$baseUrl/tasks/$taskId/toggle'),
        headers: {'Content-Type': 'application/json'},
      );

      if (response.statusCode == 200) {
        return Task.fromJson(json.decode(response.body));
      } else {
        throw Exception('Failed to toggle task completion');
      }
    } catch (e) {
      throw Exception('Error toggling task completion: $e');
    }
  }
}
