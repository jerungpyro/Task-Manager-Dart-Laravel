class Task {
  final int? id;
  final String title;
  final String? description;
  final bool completed;
  final DateTime? dueDate;
  final String priority;
  final DateTime? createdAt;
  final DateTime? updatedAt;

  Task({
    this.id,
    required this.title,
    this.description,
    this.completed = false,
    this.dueDate,
    this.priority = 'medium',
    this.createdAt,
    this.updatedAt,
  });

  factory Task.fromJson(Map<String, dynamic> json) {
    return Task(
      id: json['id'],
      title: json['title'],
      description: json['description'],
      completed: json['completed'] ?? false,
      dueDate: json['due_date'] != null ? DateTime.parse(json['due_date']) : null,
      priority: json['priority'] ?? 'medium',
      createdAt: json['created_at'] != null ? DateTime.parse(json['created_at']) : null,
      updatedAt: json['updated_at'] != null ? DateTime.parse(json['updated_at']) : null,
    );
  }

  Map<String, dynamic> toJson() {
    return {
      'id': id,
      'title': title,
      'description': description,
      'completed': completed,
      'due_date': dueDate?.toIso8601String().split('T')[0],
      'priority': priority,
    };
  }

  Task copyWith({
    int? id,
    String? title,
    String? description,
    bool? completed,
    DateTime? dueDate,
    String? priority,
    DateTime? createdAt,
    DateTime? updatedAt,
  }) {
    return Task(
      id: id ?? this.id,
      title: title ?? this.title,
      description: description ?? this.description,
      completed: completed ?? this.completed,
      dueDate: dueDate ?? this.dueDate,
      priority: priority ?? this.priority,
      createdAt: createdAt ?? this.createdAt,
      updatedAt: updatedAt ?? this.updatedAt,
    );
  }
}
