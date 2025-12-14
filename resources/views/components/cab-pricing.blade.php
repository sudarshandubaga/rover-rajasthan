{{-- Pricing Table --}}
<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-slate-200 shadow-sm rounded-lg">
        <thead>
            <tr class="bg-amber-500 text-white">
                <th class="py-3 px-6 text-left font-bold uppercase tracking-wider">Cab Option</th>
                <th class="py-3 px-6 text-left font-bold uppercase tracking-wider">Capacity</th>
                <th class="py-3 px-6 text-left font-bold uppercase tracking-wider">Cab Fare Per Day</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200">
            @foreach ($cabs as $cab)
                <tr class="hover:bg-slate-50">
                    <td class="py-4 px-6 font-medium">{{ $cab->vehicle_type }}</td>
                    <td class="py-4 px-6">{{ $cab->capacity }} Seater</td>
                    <td class="py-4 px-6">₹{{ $cab->fare }}/km</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
