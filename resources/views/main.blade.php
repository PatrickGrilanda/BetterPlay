<x-layout>
    <x-header />

    <x-nav :popular='$popular' />

    <x-movies.index :trending='$trending' :comedies='$comedies' :action='$action' :western='$western' :horror='$horror' :thriller='$thriller' :animation='$animation' />

    <x-footer />
</x-layout>