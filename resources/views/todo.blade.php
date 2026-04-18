<!DOCTYPE html>
<html>
<head>
    <title>ToDo App</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <h1>ToDoリスト</h1>

    <input type="text" id="title">
    <button onclick="addTodo()">追加</button>

    <ul id="list"></ul>

    <!-- 👇 ここにJSを書く（超重要） -->
    <script>
        async function fetchTodos() {
            const res = await fetch('/api/todos');
            const todos = await res.json();

            const list = document.getElementById('list');
            list.innerHTML = '';

            todos.forEach(todo => {
                const li = document.createElement('li');
                li.innerHTML = `
                    ${todo.title}
                    <button onclick="deleteTodo(${todo.id})">削除</button>
                `;
                list.appendChild(li);
            });
        }

        async function addTodo() {
            const title = document.getElementById('title').value;

            await fetch('/api/todos', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ title })
            });

            fetchTodos();
        }

        async function deleteTodo(id) {
            await fetch(`/api/todos/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });

            fetchTodos();
        }

        fetchTodos();
    </script>

</body>
</html>