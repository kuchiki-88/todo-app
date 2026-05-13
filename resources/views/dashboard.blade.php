<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h1 class="text-2xl font-bold mb-4">ToDoリスト</h1>

                <input type="text" id="todoInput" class="border p-2 w-full" placeholder="ToDoを入力">

                <button onclick="addTodo()" class="bg-blue-500 text-white px-4 py-2 mt-2 rounded">
                    追加
                </button>

                <ul id="todoList" class="mt-4"></ul>

            </div>
        </div>
    </div>

    <script>
        async function fetchTodos() {
            const response = await fetch('/api/todos');
            const todos = await response.json();

            const list = document.getElementById('todoList');
            list.innerHTML = '';

            todos.forEach(todo => {
    list.innerHTML += `
        <li class="border-b py-2 flex items-center justify-between">

            <div>
                <input
                    type="checkbox"
                    ${todo.completed ? 'checked' : ''}
                    onchange="toggleTodo(${todo.id}, this.checked)"
                >

                <span id="title-${todo.id}"style="${todo.completed ? 'text-decoration: line-through;' : ''}">
                    ${todo.title}
                </span>
            </div>

            <button
                onclick="editTodo(${todo.id}, '${todo.title}')"
                class="bg-yellow-500 text-white px-2 py-1 rounded mr-2"
            >
                編集
            </button>

            <button
                onclick="deleteTodo(${todo.id})"
                class="bg-red-500 text-white px-2 py-1 rounded"
            >
                削除
            </button>

        </li>
    `;
});
        }

        async function addTodo() {
            const input = document.getElementById('todoInput');

            await fetch('/api/todos', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    title: input.value
                })
            });

            input.value = '';

            fetchTodos();
        }

        async function editTodo(id, oldTitle) {

    const newTitle = prompt('新しいタイトルを入力', oldTitle);

    if (!newTitle) return;

    await fetch(`/api/todos/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            title: newTitle
        })
    });

    fetchTodos();
}

        async function toggleTodo(id, completed) {

    await fetch(`/api/todos/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            completed: completed
        })
    });

    fetchTodos();
}
async function deleteTodo(id) {

    await fetch(`/api/todos/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });

    fetchTodos();
}

        fetchTodos();
    </script>
</x-app-layout>