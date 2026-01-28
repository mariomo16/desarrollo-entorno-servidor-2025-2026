<?php
// --------------------------------- CONTROLLER
public function index()
{
    return view('quacks.index', [
        'quacks' => Quack::with([
            'user',
            'quashtags',
            'quavs' => fn($query) => $query->where('user_id', Auth::user()->id),
            'requacks' => fn($query) => $query->where('user_id', Auth::user()->id),
        ])->withCount(['quavs', 'requacks'])->latest()->get()
    ]);
}

// --------------------------------- CONTROLLER
Quack::with(['user', 'requacks'])
    ->withCount(['quavs', 'requacks'])
    ->where('user_id', $userId)
    ->orWhereHas('requacks', function ($query) use ($userId) {
        $query->where('user_id', $userId);
    })
    ->orWhereHas('user.followers', function ($query) use ($userId) {
        $query->where('follower_id', $userId);
    })
    ->orWhereHas('requacks', function ($q) use ($userId) {
        // Solo usuarios que sigo
        $q->whereHas('followers', function ($q2) use ($userId) {
            $q2->where('follower_id', $userId);
        });
    })
    ->latest()
    ->get()
// --------------------------------- LIVEWIRE
use Livewire\Component;

use App\Models\Quack;

new class extends Component {
    public int $quackId;
    public int $requackCount = 0;
    public bool $userHasRequacked = false;

    public function mount(int $quackId)
    {
        $this->quackId = $quackId;
        $this->refreshData();
    }

    public function requack()
    {
        $quack = Quack::find($this->quackId);
        $quack->requacks()->toggle(Auth::id());
        $this->refreshData();
    }

    private function refreshData()
    {
        $quack = Quack::withCount("requacks")
            ->with(["requacks" => fn($q) => $q->where("user_id", Auth::id())])
            ->find($this->quackId);

        $this->requackCount = $quack->requacks_count;
        $this->userHasRequacked = $quack->requacks->isNotEmpty();
    }
};
?>

<button wire:click="requack" class="quack-requack">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="{{ $userHasRequacked ? 'hsl(160, 100%, 36%)' : 'currentColor' }}"
        class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
    </svg>
    {{ $requackCount }}
</button>
