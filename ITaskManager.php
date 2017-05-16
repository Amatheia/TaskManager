<?php

	// No attributes in an interface

	// No implementation. No curl braces ({}).

    interface ITaskManager {

        public function create($desc);
        public function read($id);
        public function readAll();
        public function update($id, $newDesc);
        public function delete($id);

    }

?>
