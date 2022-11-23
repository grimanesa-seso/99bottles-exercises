<?php
class Bottles
{
    public function song()
    {
        return $this->verses(99, 0);
    }

    public function verses($numberVerseFrom, $numberVerseUntil = null)
    {
        $song = '';
        $cont = $numberVerseFrom;
        $numberVerseUntil = $numberVerseUntil ?? $numberVerseFrom;

        while ($cont >= $numberVerseUntil) {
            $song .= $this->verse($cont);

            if ($cont > $numberVerseUntil) {
                $song .= sprintf("\n");
            }
            $cont--;
        }
        return $song;
    }

    public function verse($numberVerse)
    {
        return sprintf(
            "%s" .
                "%s.\n" .
                "%s " .
                "%s of beer on the wall.\n",
            $this->getSentence(1, $numberVerse),
            $this->getSentence(2, $numberVerse),
            $this->getSentence(3, $numberVerse),
            $this->getLastSentence($numberVerse)
        );
    }

    private function getLastSentence($numberVerse)
    {
        return match (true) {
            $numberVerse == 1 => "no more bottles",
            $numberVerse == 2 => "1 bottle",
            $numberVerse > 2 =>  --$numberVerse . " bottles",
            default => "99 bottles"
        };
    }

    private function getSentence($pos, $numberVerse)
    {
        return match (true) {
            $pos == 1 && $numberVerse == 0 => "No more bottles of beer on the wall, ",
            $pos == 1 && $numberVerse == 1 => $numberVerse . " bottle of beer on the wall, ",
            $pos == 1 && $numberVerse > 1  => $numberVerse . " bottles of beer on the wall, ",
            $pos == 2 && $numberVerse == 0 => "no more bottles of beer",
            $pos == 2 && $numberVerse == 1 => $numberVerse . " bottle of beer",
            $pos == 2 && $numberVerse > 1  => $numberVerse . " bottles of beer",
            $pos == 3 && $numberVerse == 0 => "Go to the store and buy some more,",
            $pos == 3 && $numberVerse == 0 => "Go to the store and buy some more,",
            $pos == 3 && $numberVerse == 1 => "Take it down and pass it around,",
            $pos == 3 && $numberVerse > 1  => "Take one down and pass it around,",
        };
    }
}
