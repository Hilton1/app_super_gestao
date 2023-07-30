<h3>Fornecedor</h3>

@isset($fornecedores)
    @forelse($fornecedores as $fornecedor)
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedores[1]['cnpj'] ?? 'Tem não, chefe.' }}
        <br>
        Telefone ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }}
        <hr>
    @empty
        Não existem fornecedores cadastrados
    @endforelse
@endisset

<br>
