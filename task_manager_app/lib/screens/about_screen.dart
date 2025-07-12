import 'package:flutter/material.dart';
import 'package:url_launcher/url_launcher.dart';

class AboutScreen extends StatelessWidget {
  const AboutScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('About'),
      ),
      body: SingleChildScrollView(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const Center(
              child: Icon(
                Icons.task_alt,
                size: 80,
                color: Colors.deepPurple,
              ),
            ),
            const SizedBox(height: 16),
            const Center(
              child: Text(
                'Task Manager',
                style: TextStyle(
                  fontSize: 28,
                  fontWeight: FontWeight.bold,
                  color: Colors.deepPurple,
                ),
              ),
            ),
            const SizedBox(height: 8),
            const Center(
              child: Text(
                'Version 1.0.0',
                style: TextStyle(
                  fontSize: 16,
                  color: Colors.grey,
                ),
              ),
            ),
            const SizedBox(height: 32),
            const Text(
              'Purpose',
              style: TextStyle(
                fontSize: 20,
                fontWeight: FontWeight.bold,
              ),
            ),
            const SizedBox(height: 8),
            const Text(
              'This Task Manager app is designed to help you organize and track your daily tasks efficiently. Similar to Google Tasks, it allows you to:',
              style: TextStyle(fontSize: 16),
            ),
            const SizedBox(height: 16),
            const Row(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Icon(Icons.check_circle, color: Colors.green, size: 20),
                SizedBox(width: 8),
                Expanded(
                  child: Text(
                    'Create and manage tasks with titles and descriptions',
                    style: TextStyle(fontSize: 16),
                  ),
                ),
              ],
            ),
            const SizedBox(height: 8),
            const Row(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Icon(Icons.check_circle, color: Colors.green, size: 20),
                SizedBox(width: 8),
                Expanded(
                  child: Text(
                    'Set priorities (High, Medium, Low) for better organization',
                    style: TextStyle(fontSize: 16),
                  ),
                ),
              ],
            ),
            const SizedBox(height: 8),
            const Row(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Icon(Icons.check_circle, color: Colors.green, size: 20),
                SizedBox(width: 8),
                Expanded(
                  child: Text(
                    'Set due dates to keep track of deadlines',
                    style: TextStyle(fontSize: 16),
                  ),
                ),
              ],
            ),
            const SizedBox(height: 8),
            const Row(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Icon(Icons.check_circle, color: Colors.green, size: 20),
                SizedBox(width: 8),
                Expanded(
                  child: Text(
                    'Mark tasks as complete and track your progress',
                    style: TextStyle(fontSize: 16),
                  ),
                ),
              ],
            ),
            const SizedBox(height: 8),
            const Row(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Icon(Icons.check_circle, color: Colors.green, size: 20),
                SizedBox(width: 8),
                Expanded(
                  child: Text(
                    'View tasks in different categories (All, Pending, Completed)',
                    style: TextStyle(fontSize: 16),
                  ),
                ),
              ],
            ),
            const SizedBox(height: 32),
            const Text(
              'Author',
              style: TextStyle(
                fontSize: 20,
                fontWeight: FontWeight.bold,
              ),
            ),
            const SizedBox(height: 8),
            const Text(
              'Developed by: You',
              style: TextStyle(fontSize: 16),
            ),
            const SizedBox(height: 8),
            const Text(
              'This app was created as a task management solution using Flutter for the frontend and Laravel for the backend API.',
              style: TextStyle(fontSize: 16),
            ),
            const SizedBox(height: 32),
            const Text(
              'Technology Stack',
              style: TextStyle(
                fontSize: 20,
                fontWeight: FontWeight.bold,
              ),
            ),
            const SizedBox(height: 8),
            const Row(
              children: [
                Icon(Icons.phone_android, color: Colors.blue),
                SizedBox(width: 8),
                Text(
                  'Frontend: Flutter (Dart)',
                  style: TextStyle(fontSize: 16),
                ),
              ],
            ),
            const SizedBox(height: 8),
            const Row(
              children: [
                Icon(Icons.storage, color: Colors.red),
                SizedBox(width: 8),
                Text(
                  'Backend: Laravel (PHP)',
                  style: TextStyle(fontSize: 16),
                ),
              ],
            ),
            const SizedBox(height: 8),
            const Row(
              children: [
                Icon(Icons.data_usage, color: Colors.orange),
                SizedBox(width: 8),
                Text(
                  'Database: MySQL',
                  style: TextStyle(fontSize: 16),
                ),
              ],
            ),
            const SizedBox(height: 32),
            const Text(
              'Features',
              style: TextStyle(
                fontSize: 20,
                fontWeight: FontWeight.bold,
              ),
            ),
            const SizedBox(height: 8),
            const Text(
              '• Add, edit, and delete tasks',
              style: TextStyle(fontSize: 16),
            ),
            const SizedBox(height: 4),
            const Text(
              '• Set task priorities and due dates',
              style: TextStyle(fontSize: 16),
            ),
            const SizedBox(height: 4),
            const Text(
              '• Mark tasks as complete/incomplete',
              style: TextStyle(fontSize: 16),
            ),
            const SizedBox(height: 4),
            const Text(
              '• Filter tasks by status',
              style: TextStyle(fontSize: 16),
            ),
            const SizedBox(height: 4),
            const Text(
              '• Pull to refresh functionality',
              style: TextStyle(fontSize: 16),
            ),
            const SizedBox(height: 4),
            const Text(
              '• Material Design 3 UI',
              style: TextStyle(fontSize: 16),
            ),
            const SizedBox(height: 32),
            Center(
              child: ElevatedButton.icon(
                onPressed: () => _launchURL('https://github.com'),
                icon: const Icon(Icons.code),
                label: const Text('View Source Code'),
              ),
            ),
            const SizedBox(height: 16),
            const Center(
              child: Text(
                'Made with ❤️ using Flutter & Laravel',
                style: TextStyle(
                  fontSize: 14,
                  color: Colors.grey,
                  fontStyle: FontStyle.italic,
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }

  Future<void> _launchURL(String url) async {
    final Uri uri = Uri.parse(url);
    if (await canLaunchUrl(uri)) {
      await launchUrl(uri);
    }
  }
}
