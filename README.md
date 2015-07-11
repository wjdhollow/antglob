# antglob
## Ant style globs for PHP

The AntGlob utility is a set of the syntax specified by https://ant.apache.org/manual/dirtasks.html. Ant patterns
are used for matching files and directories, similar to glob patterns used in DOS or UNIX.

'*' matches zero or more characters, not including directory separators.

'?' matches a single character.

Patterns are considered relative paths, relative to the working directory. Only files found below the working
directory are considered. The behavior of absolute patterns is loosely defined, so its usage is not recommended.

Matching is done per directory, meaning that the first pattern is matched, and the second and so forth. The whole
pattern must be satisfied before it is considered a match. A common alternative to using glob style pattern matching
is to apply a regex. An equivalent regex would be considered 'lazy' as opposed to 'greedy'.

'**' can be used to match multiple directory levels. This can be used to match a whole directory tree, or a file
anywhere in the directory tree.

As a shorthand, any pattern ending in '/' has a '**' appended to it. Example, 'mydir'
matches a directory named 'mydir', while 'mydir/' matches all files in the 'mydir' directory tree.




