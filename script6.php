<?php
for ($first = 1; $first <= 6; $first++) {
    for ($second = 1; $second <= 6; $second++) {
        if ($second != $first)
            for ($third = 1; $third <= 6; $third++) {
                if ($third != $second && $third != $first)
                    for ($fourth = 1; $fourth <= 6; $fourth++) {
                        if ($fourth != $third && $fourth != $second && $fourth != $first)
                            for ($fifth = 1; $fifth <= 6; $fifth++) {
                                if ($fifth != $fourth && $fifth != $third && $fifth != $second && $fifth != $first)
                                    for ($sixth = 1; $sixth <= 6; $sixth++) {
                                        if ($sixth != $fifth && $sixth != $fourth && $sixth != $third && $sixth != $second && $sixth != $first) {
                                            file_put_contents("san_goku", "Public speaking is very easy.\n1 2 6 24 120 720\n0 q 777\n9\nopekmq\n$first $second $third $fourth $fifth $sixth\n");
                                            exec("./bomb san_goku", $ret);
                                            if ($ret[count($ret) - 1] != "The bomb has blown up.")
                                                echo "$first $second $third $fourth $fifth $sixth\n";
                                        }
                                    }
                            }
                    }
            }
    }
}
