HHVM_DEFINE_EXTENSION("soap"
  SOURCES
    encoding.cpp
    ext_soap.cpp
    packet.cpp
    schema.cpp
    sdl.cpp
    soap.cpp
    xml.cpp
  HEADERS
    encoding.h
    ext_soap.h
    packet.h
    sdl.h
    soap.h
    xml.h
  SYSTEMLIB
    ext_soap.php
  DEPENDS
    libFolly
)
