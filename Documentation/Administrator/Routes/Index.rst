..  include:: /Includes.rst.txt


..  _routes:

======
Routes
======

With TYPO3 9 you have the possibility to configure RouteEnhancers

Example Configuration
=====================

..  code-block:: yaml

    routeEnhancers:
      SchooldirectoryPlugin:
        type: Extbase
        extension: Schooldirectory
        plugin: List
        limitToPages: [27]
        routes:
          -
            routePath: '/{letter}'
            _controller: 'School::list'
          -
            routePath: '/schulen/s/info/{school_title}'
            _controller: 'School::show'
            _arguments:
              school_title: school
        requirements:
          letter: '^(0-9|[a-z])?$'
          school_title: '^[a-zA-Z0-9\-_]+$'
        defaultController: 'School::list'
        aspects:
          school_title:
            type: PersistedAliasMapper
            tableName: tx_schooldirectory_domain_model_school
            routeFieldName: path_segment
          letter:
            type: StaticValueMapper
            map:
              0-9: 0-9
              'a': 'a'
              'b': 'b'
              'c': 'c'
              'd': 'd'
              'e': 'e'
              'f': 'f'
              'g': 'g'
              'h': 'h'
              'i': 'i'
              'j': 'j'
              'k': 'k'
              'l': 'l'
              'm': 'm'
              'n': 'n'
              'o': 'o'
              'p': 'p'
              'q': 'q'
              'r': 'r'
              's': 's'
              't': 't'
              'u': 'u'
              'v': 'v'
              'w': 'w'
              'x': 'x'
              'y': 'y'
              'z': 'z'
              '': ''
